function paginate(items, itemsPerPage, paginationContainer) {
  let currentPage = 1;
  const totalPages = Math.ceil(items.length / itemsPerPage);

  function showItems(page) {

    const itemsContainer = document.querySelector('.paginated-items');

    if (itemsContainer === null) {
      return;
    }

    const startIndex = (page - 1) * itemsPerPage;
    const endIndex = startIndex + itemsPerPage;
    const pageItems = [...items].slice(startIndex, endIndex);

    if (itemsContainer.hasChildNodes() && itemsContainer.children.length > 0) {
      itemsContainer.removeChild(itemsContainer.children[0]);
    }

    const table = document.createElement('table');
    const tr = document.createElement('tr');
    const indexHeader = document.createElement('th');
    const indexText = document.createTextNode('index');
    const valueHeader = document.createElement('th');
    const valueText = document.createTextNode('value');

    indexHeader.appendChild(indexText);
    valueHeader.appendChild(valueText);

    tr.appendChild(indexHeader);
    tr.appendChild(valueHeader);
    table.appendChild(tr);

    pageItems.forEach((item) => {
      table.appendChild(item);
    });

    itemsContainer.appendChild(table);
  }

  function setupPagination() {
    const pagination = document.querySelector(paginationContainer);
    pagination.innerHTML = '';

    for (let i = 1; i <= totalPages; i++) {
      const link = document.createElement('a');
      link.href = '#';
      link.innerText = i.toString();

      if (i === currentPage) {
        link.classList.add('active');
      }

      link.addEventListener('click', (event) => {
        event.preventDefault();
        currentPage = i;
        showItems(currentPage);

        const currentActive = pagination.querySelector('.active');
        currentActive.classList.remove('active');
        link.classList.add('active');
      });

      pagination.appendChild(link);
    }
  }

  showItems(currentPage);
  setupPagination();
}
