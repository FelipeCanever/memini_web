function flipCard(cardId) {
	const card = $(`#${cardId}`);
	
	const front = card.find(`#${cardId}Front`);
	const back = card.find(`#${cardId}Back`);
	
	front.toggle();
	back.toggle();
}
