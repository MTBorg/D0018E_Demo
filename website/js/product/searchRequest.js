function searchRequest() {
    input = document.getElementsByTagName("input");
	var search = input[0].value;

	console.log(search);

	window.location.href = '/index.php?search=' + search;
}