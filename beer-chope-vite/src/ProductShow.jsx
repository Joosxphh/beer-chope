import React from "react";
import { Nav } from "./component/header";
import { ImageProductLeft } from "./component/body";

const ProductShow = ({ darkMode, toggleDarkMode }) => {
  return (
    <div className={darkMode && "dark"}>
      <Nav toggleDarkMode={toggleDarkMode} />
      <div className="flex flex-row">
        <ImageProductLeft />
        <div
          className="bg-gray-100 dark:bg-gray-800 flex-grow m-2 shadow rounded flex flex-wrap overflow-y-auto overflow-x-hidden"
          style={{ width: "55vw", height: "84vh" }}
        >
          <div className=" rounded-lg shadow-lg overflow-hidden">
            <div className="md:flex">
              <div className="p-8">
                <div className="uppercase tracking-wide text-sm text-indigo-500 font-semibold">
                  Category
                </div>
                <h1 className="block mt-1 text-lg leading-tight font-medium text-black hover:underline">
                  Product Title
                </h1>
                <p className="mt-2 text-gray-500">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed
                  suscipit vestibulum nulla, a convallis mi faucibus sit amet.
                  Nulla facilisi. Maecenas posuere metus sed est consectetur
                  aliquam.
                </p>
                <div className="mt-4">
                  <span className="text-gray-500">Price: </span>
                  <span className="text-gray-900 font-semibold">$19.99</span>
                </div>
                <div className="mt-4">
                  <button className="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                    Add to Cart
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default ProductShow;
