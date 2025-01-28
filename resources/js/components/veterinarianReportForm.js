document.getElementById('animal-name').addEventListener('change', async function() {
    const animalId = this.value;

    try {
        const response = await fetch(`/api/admin/zoo/foods-consum/animal/${animalId}`);

        if (!response.ok) {
            throw new Error('Erreur lors de la récupération des données');
        }

        const lastFoodConsumed = await response.json();

        // Efface la liste précédente
        const foodList = document.getElementById('food-consumed-list');
        foodList.innerHTML = '';

        // Affiche le dernier aliment consommé ou un message
        if (lastFoodConsumed) {
            const foodItem = document.createElement('p');
            foodItem.classList.add('food-item');
            foodItem.textContent = `${lastFoodConsumed.food.name} - ${lastFoodConsumed.quantity} ${lastFoodConsumed.unit}`;
            foodList.appendChild(foodItem);
        } else {
            foodList.textContent = 'Aucun aliment consommé trouvé pour cet animal.';
        }
    } catch (error) {
        console.error('Erreur:', error);
    }
});
