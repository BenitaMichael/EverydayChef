const searchBtn = document.getElementById('search-btn');
const mealList = document.getElementById('meal');
const mealDetails = document.querySelector('.meal-details-content');
const recipeExitBtn = document.getElementById('recipe-exit-btn');

recipeExitBtn.addEventListener('click', () => {
    mealDetails.parentElement.classList.remove('showRecipe');
});


// get meal list that matches with the ingredient
searchBtn.addEventListener('click', async() =>{
    let searchInputText = document.getElementById('search-input').value.trim();
    const response = await fetch(`https://www.themealdb.com/api/json/v1/1/filter.php?i=${searchInputText}`)
    const data = await response.json()
    .then(data => {
        // console.log(data)
        let html = "";
        if(data.meals){
            data.meals.forEach(meal => {
                html += `
                    <div class = "meal-item" data-id = "${meal.idMeal}">
                        <div class = "meal-image">
                            <img src = "${meal.strMealThumb}" alt = "food">
                        </div>
                        <div class = "meal-name">
                            <h3>${meal.strMeal}</h3>
                            <a href = "#" class = "recipe-btn">Get Recipe</a>
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


// get recipe of the meal
mealList.addEventListener('click', async(e)=>{
    e.preventDefault();
    if(e.target.classList.contains('recipe-btn')){
        let mealItem = e.target.parentElement.parentElement;
        const response = await fetch(`https://www.themealdb.com/api/json/v1/1/lookup.php?i=${mealItem.dataset.id}`)
        const data = await response.json()
        .then(data => mealRecipePopUp(data.meals));
    }
});

// Details popUp
mealRecipePopUp = (meal) =>{
    // console.log(meal);
    meal = meal[0];
    let html = `
        <h2 class = "recipe-title">${meal.strMeal}</h2>
        <p class = "recipe-category">${meal.strCategory}</p>
        <div class = "recipe-instruct">
            <h3>Instructions:</h3>
            <p>${meal.strInstructions}</p>
        </div>
        <div class = "recipe-meal-image">
            <img src = "${meal.strMealThumb}" alt = "">
        </div>
        <div class = "recipe-link">
            <a href = "${meal.strYoutube}" target = "_blank">Watch Video</a>
        </div>
    `;
    mealDetails.innerHTML = html;
    mealDetails.parentElement.classList.add('showRecipe');
}