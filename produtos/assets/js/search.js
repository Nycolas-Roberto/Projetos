const inputSearch = document.querySelector('#buscar');
const list = document.querySelector('#myList');

inputSearch.addEventListener('input', function() {
  const term = inputSearch.value.toLowerCase();
  const items = list.getElementsByTagName('li');

  Array.from(items).forEach(function(item) {
    const text = item.textContent.toLowerCase();
    if (text.indexOf(term) !== -1) {
      item.style.display = 'block';
    } else {
      item.style.display = 'none';
    }
  });
});
