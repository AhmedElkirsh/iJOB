import sys
import json
import re
import spacy

# Load the SpaCy model
nlp = spacy.load("en_core_web_sm")

def extract_entities(text: str) -> dict:
    """Extract named entities from text using SpaCy."""
    doc = nlp(text)
    entities = {
        "ORG": [],
        "DATE": [],
        "PERSON": [],
    }
    for ent in doc.ents:
        if ent.label_ in entities:
            entities[ent.label_].append(ent.text)
    return entities

def parse_resume(text: str, skills: list) -> dict:
    """Parse resume text to extract relevant information."""
    data = {}

    # Extract email
    email_pattern = re.compile(r'\b[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Z|a-z]{2,}\b')
    email_match = email_pattern.search(text)
    if email_match:
        data['email'] = email_match.group(0)

    # Extract phone number (Egyptian code: +20)
    phone_pattern = re.compile(r'\+20\d{10}')
    phone_match = phone_pattern.search(text)
    if phone_match:
        data['phone'] = phone_match.group(0)

    # Extract name
    entities = extract_entities(text)
    if entities["PERSON"]:
        data['name'] = entities["PERSON"][0]

    # Extract skills
    data['skills'] = []
    for skill in skills:
        if re.search(r'\b' + re.escape(skill) + r'\b', text, re.IGNORECASE):
            data['skills'].append(skill)

    # Extract education
    education = []
    education_sections = re.findall(r'(?:\b\d{4}-present|\b\d{4}-\d{4}|\b\d+months?|\b\d{4})[\s\S]+?(?=\b\d{4}-present|\b\d{4}-\d{4}|\b\d{4}|$)', text)
    for section in education_sections:
        edu_info = {
            "university": "",
            "specialization": "",
            "degree": "",
            "start_date": "",
            "end_date": "",
            "grade": ""
        }
        start_end_dates = re.findall(r'(\w+ \d{4})-(present|\w+ \d{4})', section)
        if start_end_dates:
            edu_info["start_date"], edu_info["end_date"] = start_end_dates[0]
        edu_info["university"] = re.search(r'(\w+ University|\w+ Institute)', section).group(0) if re.search(r'(\w+ University|\w+ Institute)', section) else ""
        edu_info["degree"] = re.search(r'(Diploma|Bachelor|Master|PhD)', section).group(0) if re.search(r'(Diploma|Bachelor|Master|PhD)', section) else ""
        education.append(edu_info)
    data['education'] = education

    # Extract experience
    experience = []
    experience_sections = re.findall(r'(?:\b\d{4}-present|\b\d{4}-\d{4}|\b\d+months?|\b\d{4})[\s\S]+?(?=\b\d{4}-present|\b\d{4}-\d{4}|\b\d{4}|$)', text)
    for section in experience_sections:
        exp_info = {
            "job_title": "",
            "company": "",
            "start_date": "",
            "end_date": "",
            "description": ""
        }
        start_end_dates = re.findall(r'(\w+ \d{4})-(present|\w+ \d{4})', section)
        if start_end_dates:
            exp_info["start_date"], exp_info["end_date"] = start_end_dates[0]
        exp_info["job_title"] = re.search(r'(\w+ Developer|\w+ Engineer|\w+ Manager)', section).group(0) if re.search(r'(\w+ Developer|\w+ Engineer|\w+ Manager)', section) else ""
        exp_info["company"] = re.search(r'(\w+ Company)', section).group(0) if re.search(r'(\w+ Company)', section) else ""
        exp_info["description"] = re.search(r'(Responsibilities:.+|Achievements:.+)', section).group(0) if re.search(r'(Responsibilities:.+|Achievements:.+)', section) else ""
        experience.append(exp_info)
    data['experience'] = experience

    return data

if __name__ == "__main__":
    resume_file = sys.argv[1]
    skills_list = sys.argv[2].split(',')
    
    with open(resume_file, 'r') as file:
        resume_text = file.read()

    parsed_data = parse_resume(resume_text, skills_list)
    print(json.dumps(parsed_data))
