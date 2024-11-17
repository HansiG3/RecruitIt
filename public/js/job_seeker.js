function updateSkillsContainer() {
  skillsContainer.innerHTML = "";

  skills.forEach((skill, index) => {
    const tag = document.createElement("span");
    tag.classList.add("skill-tag");
    tag.textContent = skill;

    const removeButton = document.createElement("button");
    removeButton.textContent = "x";
    removeButton.classList.add("remove-skill");
    removeButton.addEventListener("click", () => {
      skills.splice(index, 1);
      updateSkillsContainer();
      hiddenSkills.value = skills.join(",");

      if (skills.length < 5) {
        errorSkills.textContent = "";
      }
    });

    tag.appendChild(removeButton);
    skillsContainer.appendChild(tag);
  });
}

function validateJobSeeker() {
  const experience = document.getElementById("experience").value;
  const errorExperience = document.getElementById("forexperience");

  let valid = true;

  errorExperience.textContent = "";
  errorSkills.textContent = "";

  if (!experience || experience <= 0) {
    errorExperience.textContent = "Please enter valid experience.";
    valid = false;
  }

  if (skills.length !== 5) {
    errorSkills.textContent =
      skills.length < 5
        ? "Please add exactly 5 skills."
        : "You can only add up to 5 skills.";
    valid = false;
  }

  return valid;
}

const skillInput = document.getElementById("skills");
const skillsContainer = document.getElementById("skills-container");
const hiddenSkills = document.getElementById("hidden-skills");
const errorSkills = document.getElementById("forskills");

let skills = [];

skillInput.addEventListener("keypress", (e) => {
  if (e.key === "Enter") {
    e.preventDefault();
    const skill = skillInput.value.trim();

    if (skill === "") {
      errorSkills.textContent = "Skill cannot be empty.";
      return;
    }

    if (skills.includes(skill)) {
      errorSkills.textContent = "Duplicate skills are not allowed.";
      return;
    }

    if (skills.length >= 5) {
      errorSkills.textContent = "You can only add up to 5 skills.";
      return;
    }

    skills.push(skill);
    skillInput.value = "";
    errorSkills.textContent = "";

    updateSkillsContainer();

    hiddenSkills.value = skills.join(",");
  }
});
