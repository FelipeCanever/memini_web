// Vira uma carta.
function flipCard(cardId) {
	const card = $(`#${cardId}`);
	card.toggleClass("bg-light cardBack");
	toggleFrontBack(card);
}

// Alterna entre a parte da frente e a parte de trás de uma carta.
function toggleFrontBack(card) {
	const cardId = card.attr("id");

	const front = card.find(`#${cardId}Front`);
	const back = card.find(`#${cardId}Back`);
	
	for (const element of [front, back])
		element.toggle();
}

// Obter id. da carta em que o usuário apertou "Excluir".
function setCardIdForDeletion(cardId) {
	$(`#cardIdInput`).val(cardId);
}
