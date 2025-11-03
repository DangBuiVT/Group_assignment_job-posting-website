console.log("script loaded");
document.addEventListener("DOMContentLoaded", () => {
  const sortBtn = document.getElementById("sort-toggle");
  const sortIcon = document.getElementById("sort-icon");
  const sortText = document.getElementById("sort-text");

  let isDescending = true;

  if (sortBtn) {
    sortBtn.addEventListener("click", () => {
      isDescending = !isDescending;

      sortText.textContent = isDescending ? "From latest" : "From first";
      sortIcon.innerHTML = isDescending
        ? '<path fill="currentColor" d="M7.5 12L0 4h15z"/>'
        : '<path fill="currentColor" d="m7.5 3l7.5 8H0z"/>';
    });
  }

  const showMore = document.getElementById("show-more");
  const filterSection = document.getElementsByClassName("filter-section");
  const catFilter = document.getElementsByClassName("category-filter")[0];
  let isShowMore = false;

  if (showMore) {
    showMore.addEventListener("click", () => {
      isShowMore = !isShowMore;

      if (isShowMore) {
        catFilter.classList.add("expanded");
        for (let i = 0; i < filterSection.length; i++) {
          if (!filterSection[i].classList.contains("category-filter")) {
            filterSection[i].classList.add("inactive");
          }
        }
        showMore.textContent = "Show Less";
      } else {
        catFilter.classList.remove("expanded");
        for (let i = 0; i < filterSection.length; i++) {
          if (!filterSection[i].classList.contains("category-filter")) {
            filterSection[i].classList.remove("inactive");
          }
        }
        showMore.textContent = "Show More";
      }
    });
  }

  const salSlider = document.querySelector(".salary-range-slider");
  const salDisp = document.getElementById("salary-display-text");

  if (salSlider) {
    salSlider.addEventListener("change", () => {
      const salSliderValue = salSlider.value;
      salDisp.innerText = `Salary: $${salSliderValue * 100}`;
    });
  }

  const logBtn = document.querySelector(".log-btn");
  const regBtn = document.querySelector(".reg-btn");
  const dir_to_view = "http://localhost/Group_assignment/public/index.php";
  logBtn.addEventListener("click", () => {
    console.log("login clicked");
    window.location.href = dir_to_view + "?page=auth&action=login";
  });

  regBtn.addEventListener("click", () => {
    console.log("Register button clicked");
    window.location.href = dir_to_view + "?page=auth&action=signup";
  });
});
