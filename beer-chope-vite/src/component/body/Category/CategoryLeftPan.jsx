import Skeleton from "react-loading-skeleton";
import "react-loading-skeleton/dist/skeleton.css";

const CategoryLeftPan = ({ isLoading, categories, filterProducts }) => {
  return isLoading ? (
    <div
      className="w-64 bg-gray-100 dark:bg-gray-800 m-2 ml-0 border-r rounded-r shadow text-center overflow-auto"
      style={{ height: "86vh" }}
    >
      <h2 className="text-lg font-semibold mb-4 dark:text-white">Catégories</h2>
      <ul>
        <Skeleton width={200} height={10} count={30} />
      </ul>
    </div>
  ) : (
    <div
      className="w-64 bg-gray-100 dark:bg-gray-800 m-2 ml-0 border-r rounded-r shadow text-center overflow-auto"
      style={{ height: "86vh" }}
    >
      <h2 className="text-lg font-semibold mb-4 dark:text-white">Catégories</h2>
      <ul>
        {categories.map((category, index) => (
          <li
            key={index}
            className="mb-2 cursor-pointer hover:text-blue-600 dark:hover:text-blue-300 dark:text-white"
            onClick={() => filterProducts(category)}
          >
            {category}
          </li>
        ))}
      </ul>
    </div>
  );
};

export default CategoryLeftPan;
