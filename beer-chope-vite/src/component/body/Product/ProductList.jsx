import ProductCard from "./ProductCard";
import ProductSkeleton from "./ProductSkeleton";

const ProductList = ({
  skeletons,
  isLoading,
  products,
  selectedCategory,
  resetCategorySelected,
  isAuth,
}) => {
  return (
    <div
      className="bg-gray-100 dark:bg-gray-800 flex-grow m-2 mr-0 rounded-l shadow rounded overflow-y-auto overflow-x-hidden"
      style={{ width: "calc(100vw - 18rem)", height: "86vh" }}
    >
      {selectedCategory && (
        <div
          className="bg-gray-300 dark:text-white dark:bg-gray-600 rounded flex m-4 shadow cursor-pointer"
          style={{
            maxWidth: "fit-content",
            width: "fit-content",
            padding: "0.5rem",
          }}
          onClick={() => resetCategorySelected()}
        >
          {selectedCategory}
        </div>
      )}
      <div className="flex flex-wrap">
        {isLoading
          ? skeletons.map((index) => <ProductSkeleton key={index} />)
          : products?.data.map((product, index) => (
              <ProductCard
                key={index}
                isLoading={isLoading}
                isAuth={isAuth}
                {...product}
              />
            ))}
      </div>
    </div>
  );
};

export default ProductList;
