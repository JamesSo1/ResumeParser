#!/usr/bin/env python3
from PyPDF2 import PdfReader
import os
import glob
import json
import pymysql

# assign directory
directory = 'uploads'
f_contents = ''

# access the latest file that was just added into the directory
list_of_files = glob.glob('/Applications/XAMPP/xamppfiles/htdocs/resumeparserapp/uploads/*')
latest_file = max(list_of_files, key=os.path.getctime)
print(latest_file.replace('/Applications/XAMPP/xamppfiles/htdocs/ResumeParserApp/uploads/', ''))
reader = PdfReader(latest_file)

# go through each page and extract the text from each page of the pdf
for i in range(len(reader.pages)):
    f_contents = f_contents + reader.pages[i].extract_text()

with open('resumeData.json','r') as file:
    id = latest_file.replace('/Applications/XAMPP/xamppfiles/htdocs/resumeparserapp/uploads/', '')
    id = id.replace('.pdf', '')
    entry = {'id': id, 'content': f_contents}
    data = json.loads(file.read())
    data.append(entry)


with open('resumeData.json','w') as file:
    json.dump(data,file)






