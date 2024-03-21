const CategoryLeftPan = () => {
  const categories = [
    "Catégorie 1",
    "Catégorie 2",
    "Catégorie 3",
    "Catégorie 4",
  ];

  return (
    <div
      className="w-64 bg-gray-100 dark:bg-gray-800 m-2 border-r rounded shadow text-center"
      style={{ height: "84vh" }}
    >
      <h2 className="text-lg font-semibold mb-4 dark:text-white">Catégories</h2>
      <ul>
        {categories.map((category, index) => (
          <li
            key={index}
            className="mb-2 cursor-pointer hover:text-blue-600 dark:hover:text-blue-300 dark:text-white"
          >
            {category}
          </li>
        ))}
      </ul>
    </div>
  );
};

export default CategoryLeftPan;
