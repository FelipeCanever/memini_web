function flipCard(cardId) {
	const card = $(`#${cardId}`);
	card.toggleClass("bg-light cardBack");
	toggleFrontBack(card);
}

function toggleFrontBack(card) {
	const cardId = card.attr("id");

	const front = card.find(`#${cardId}Front`);
	const back = card.find(`#${cardId}Back`);
	
	for (const element of [front, back])
		element.toggle();
}

function deleteCard(cardId) {
	const card = $(`#${cardId}`);
	console.log("Delete card!");
}
