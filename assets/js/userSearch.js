const searchBtn = document.getElementById('search-btn');
const mealList = document.getElementById('meal');
const mealDetails = document.querySelector('.meal-details-content');
const recipeExitBtn = document.getElementById('recipe-exit-btn');
const breakfastBtn = document.getElementById('breakfast-btn');
const lunchBtn = document.getElementById('lunch-btn');
const dinnerBtn = document.getElementById('dinner-btn');
const snackBtn = document.getElementById('snack-btn');
const APP_ID = "";
const APP_key = "";
const API_URL = "https://api.edamam.com/search";
// const APP_ID = process.env.APP_ID;
// const APP_key = process.env.APP_key;


// get meal list that matches with the ingredient
searchBtn.addEventListener('click', async() =>{
    let searchInputText = document.getElementById('search-input').value.trim();
    const response = await fetch(`${API_URL}?q=${searchInputText}&app_id=${APP_ID}&app_key=${APP_key}&from=0&to=20`)
    const data = await response.json()
    .then(data => {
        console.log(data)
        let html = "";
        if(data.hits){
            data.hits.forEach(meal => {
                html += `
                    <div class = "meal-item" data-id = "${meal.idMeal}">
                        <div class = "meal-image">
                            <img src = "${meal.recipe.image}" alt = "meal image">
                        </div>
                        <div class = "meal-name">
                            <h3>${meal.recipe.label}</h3>
                            <div class="meal-info">
                            <p><span>Cusine Type: </span> ${meal.recipe.cuisineType}</p>
                            <p><span>Meal Type: </span> ${meal.recipe.mealType}</p>
                            <p><span>Total Calories: </span> ${meal.recipe.calories.toFixed(2)}</p>
                            </div>
                            <a target="_blank" href = "${meal.recipe.url}" class = "recipe-btn">Get Recipe</a>
                        </div>
                    </div>
                `;
            });
            mealList.classList.remove('notFound');
        } else{
            html = "Sorry, we do not have any provisions for that yet!";
            mealList.classList.add('notFound');
        }

        mealList.innerHTML = html;
    });
});




// Function to fetch recipes based on meal type
async function fetchRecipes(mealType) {
    const response = await fetch(`${API_URL}?q=${mealType}&app_id=${APP_ID}&app_key=${APP_key}&from=0&to=20`);
    const data = await response.json();
    return data.hits;
}

// Event listeners for meal type buttons
breakfastBtn.addEventListener('click', async () => {
    const breakfastRecipes = await fetchRecipes('breakfast');
    displayRecipes(breakfastRecipes);
});

lunchBtn.addEventListener('click', async () => {
    const lunchRecipes = await fetchRecipes('lunch');
    displayRecipes(lunchRecipes);
});

dinnerBtn.addEventListener('click', async () => {
    const dinnerRecipes = await fetchRecipes('dinner');
    displayRecipes(dinnerRecipes);
});

snackBtn.addEventListener('click', async () => {
    const snackRecipes = await fetchRecipes('snack');
    displayRecipes(snackRecipes);
});

// Display recipes on the webpage
function displayRecipes(recipes) {
    let html = "";
    if (recipes.length > 0) {
        recipes.forEach(meal => {
            html += `
                <div class="meal-item" data-id="${meal.idMeal}">
                    <div class="meal-image">
                        <img src="${meal.recipe.image}" alt="meal image">
                    </div>
                    <div class="meal-name">
                        <h3>${meal.recipe.label}</h3>
                        <div class="meal-info">
                            <p><span>Cuisine Type:</span> ${meal.recipe.cuisineType}</p>
                            <p><span>Meal Type:</span> ${meal.recipe.mealType}</p>
                            <p><span>Total Calories:</span> ${meal.recipe.calories.toFixed(2)}</p>
                        </div>
                        <a target="_blank" href="${meal.recipe.url}" class="recipe-btn">Get Recipe</a>
                    </div>
                </div>
            `;
        });
        mealList.classList.remove('notFound');
    } else {
        html = "Sorry, we do not have any provisions for that yet!";
        mealList.classList.add('notFound');
    }

    mealList.innerHTML = html;
}


// detailsExitBtn.addEventListener('click', () => {
//     mealDetails.parentElement.classList.remove('showRecipe');
// });