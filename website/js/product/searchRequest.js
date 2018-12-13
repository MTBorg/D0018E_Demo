function searchRequest() {
    input = document.getElementsByTagName("input");
	var search = input[0].value;

	window.location.href = '/index.php?search=' + search;
}