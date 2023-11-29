  document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.getElementById("searchInput");
    const tableRows = document.querySelectorAll(".table-row");

    searchInput.addEventListener("input", function () {
      const searchTerm = searchInput.value.toLowerCase();

      tableRows.forEach(function (row) {
        const rowData = Array.from(row.children)
          .map((cell) => cell.textContent.toLowerCase())
          .join(" ");

        if (rowData.includes(searchTerm)) {
          row.style.display = "table-row";
        } else {
          row.style.display = "none";
        }
      });
    });
  });
