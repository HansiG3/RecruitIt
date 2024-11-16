document.addEventListener('DOMContentLoaded', () => {
    const skillsInput = document.getElementById('skillsInput');
    const tagsContainer = document.getElementById('tagsContainer');
    const skillsHiddenInput = document.getElementById('skillsHiddenInput');
    const errorMessage = document.getElementById('forskills');

    let skills = [];

    skillsInput.addEventListener('keypress', function (e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            const skill = skillsInput.value.trim();

            if (skill === '') {
                errorMessage.textContent = 'Skill cannot be empty!';
                return;
            }
            if (skills.includes(skill)) {
                errorMessage.textContent = 'Skill already added!';
                return;
            }
            if (skills.length >= 5) {
                errorMessage.textContent = 'You can only add up to 5 skills!';
                return;
            }

            skills.push(skill);
            updateTagsUI();
            skillsInput.value = '';
            errorMessage.textContent = '';
        }
    });

    function updateTagsUI() {
        tagsContainer.innerHTML = '';
        skills.forEach((skill, index) => {
            const tag = document.createElement('div');
            tag.classList.add('tag');

            const span = document.createElement('span');
            span.textContent = skill;

            const button = document.createElement('button');
            button.textContent = '×';
            button.addEventListener('click', () => removeSkill(index));

            tag.appendChild(span);
            tag.appendChild(button);
            tagsContainer.appendChild(tag);
        });

        skillsHiddenInput.value = JSON.stringify(skills);
    }

    function removeSkill(index) {
        skills.splice(index, 1);
        updateTagsUI();
    }
});

function validateJobSeeker() {
        const experience = document.getElementById("experience").value;
        const skillsContainer = document.getElementById("skills-container");
        const errorExperience = document.getElementById("forexperience");
        const errorSkills = document.getElementById("forskills");
    
        let valid = true;
    
        errorExperience.textContent = "";
        errorSkills.textContent = "";
    
        if (!experience || experience <= 0) {
            errorExperience.textContent = "Please enter valid experience.";
            valid = false;
        }
    
        const skills = Array.from(skillsContainer.querySelectorAll(".skill-tag")).map(
            (tag) => tag.textContent.trim()
        );
    
        if (skills.length !== 5) {
            errorSkills.textContent =
                skills.length < 5
                    ? "Please add exactly 5 skills."
                    : "You can only add up to 5 skills.";
            valid = false;
        }
    
        return valid;
    }