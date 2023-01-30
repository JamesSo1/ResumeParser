# ResumeParserProject

## Project Description

This web app takes in resumes from various users in the form of a pdf file. The contents of these resume files are stored and displayed in the form of a chart. The resume files can be filtered through using a search bar that can take one or more key terms.

For an example of how the resume data is stored within a json file, refer to the example that is preset within [resumeData.json.](https://github.com/JamesSo1/ResumeParserProject/blob/main/resumeData.json)

## Technologies Used

Python was used to take a resume pdf file and convert it into text using the Python library, [PyPDF2](https://pypdf2.readthedocs.io/en/3.0.0/). This text was then written and stored in the resumeData.json file.

PHP was made to create all the dynamic web pages for this application. These pages consist of the resume submission page, the resume display page, and the resume display page after a search term(s) had been entered. The resume data stored in the resumeData.json file is able to be accessed via PHP to allow for the display of all and specific resume data. The search.php file in particular is what takes care of filtering resumes by keywords as well as displaying the resumes after they are filtered.

Bootstrap was used to style the PHP/HTML pages. 

This application was run on localhost server which was launched using the [XAMPP](https://www.apachefriends.org/) application.
