import React from "react";

const CategoryLeftPan = () => {
  const categories = [
    "Catégorie 1",
    "Catégorie 2",
    "Catégorie 3",
    "Catégorie 4",
  ];

  return (
    <div className="w-64 h-full bg-gray-100 p-4 border-r border-gray-200">
      <h2 className="text-lg font-semibold mb-4">Catégories</h2>
      <ul>
        {categories.map((category, index) => (
          <li key={index} className="mb-2 cursor-pointer hover:text-blue-600">
            {category}
          </li>
        ))}
      </ul>
    </div>
  );
};

export default CategoryLeftPan;
