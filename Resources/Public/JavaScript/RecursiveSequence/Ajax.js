async function calculate(event) {
  event.preventDefault();

  const form = event.target;
  const formData = new FormData(form);
  const url = new URL(form.dataset.ajaxUrl);

  try {
    const response = await fetch(url, {
      method: 'post',
      body: new URLSearchParams({
        a: formData.get('tx_chumaths_recursivesequence[a]').toString(),
        b: formData.get('tx_chumaths_recursivesequence[b]').toString(),
        iterations: formData.get('tx_chumaths_recursivesequence[iterations]').toString()
      }),
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
      }
    });

    if (!response.ok) {
      console.error(`The AJAX request was not successful. The response status is: ${response.status}`);
    }

    const json = await response.json();

    let table = document.querySelector('.tx-chumaths table.sequence-values.hidden');
    table.innerHTML = '';

    let tr, indexColumn, valueColumn, indexText, valueText;
    for (const [index, value] of json.values.entries()) {
      tr = document.createElement('tr');

      indexColumn = document.createElement('td');
      indexText = document.createTextNode(index);
      valueColumn = document.createElement('td');
      valueText = document.createTextNode(value);

      indexColumn.appendChild(indexText);
      valueColumn.appendChild(valueText);

      tr.appendChild(indexColumn);
      tr.appendChild(valueColumn);
      table.appendChild(tr);
    }
    const items = document.querySelectorAll('.tx-chumaths table.sequence-values.hidden tr');

    if (typeof items !== 'undefined' && items.length > 0) {
      paginate(items, 10, '.tx-chumaths .pagination-container');
    }
  } catch (error) {
    console.error(error.message);
  }
}

document.querySelector('.tx-chumaths .js-recursive-sequence-form').addEventListener('submit', calculate);
