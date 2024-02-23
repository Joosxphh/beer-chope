import ProductCard from "./ProductCard";

const ProductList = () => {
  return (
    <div
      className="bg-gray-100 dark:bg-gray-800 flex-grow m-2 shadow rounded flex flex-wrap overflow-y-auto overflow-x-hidden"
      style={{ width: "calc(100vw - 18rem)", height: "84vh" }}
    >
      <ProductCard />
      <ProductCard />
      <ProductCard />
      <ProductCard />
      <ProductCard />
      <ProductCard />
    </div>
  );
};

export default ProductList;
