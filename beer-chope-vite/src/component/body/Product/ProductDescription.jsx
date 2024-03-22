const ProductDescription = ({ name, description, categories, price }) => {
  return (
    <div
      className="bg-gray-100  dark:bg-gray-800 flex-grow m-2 mr-0 shadow rounded-l flex flex-wrap"
      style={{ width: "55vw", height: "85vh" }}
    >
      <div className="rounded-lg shadow-lg overflow-hidden">
        <div className="md:flex">
          <div
            className="p-8 flex flex-col justify-between"
            style={{ height: "85vh" }}
          >
            <div className="uppercase tracking-wide text-sm text-indigo-500 font-semibold">
              {categories &&
                categories.map((category) => category.name).join(", ")}
              <h1 className="block mt-1 dark:text-white text-lg leading-tight font-medium text-black hover:underline">
                {name}
              </h1>
            </div>

            <p className="mt-2 text-gray-500 dark:text-white">{description}</p>

            <div>
              <div className="mt-4">
                <span className="text-gray-500 dark:text-gray-200">Price:</span>
                <span className="text-gray-900 font-semibold dark:text-white">{`$${price}.00`}</span>
              </div>
              <div className="mt-4">
                <button className="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded mr-4">
                  Add to Cart
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default ProductDescription;
