import { Switch } from "@material-tailwind/react";

import { BeakerIcon } from "@heroicons/react/24/solid";

const Nav = ({ toggleDarkMode }) => {
  return (
    <div>
      <nav
        className="flex flex-row items-center m-2 shadow rounded bg-gray-100 dark:bg-gray-800"
        style={{ height: "12vh", width: "calc(100vw - 2rem)" }}
      >
        <BeakerIcon className="ml-5 h-10 text-gray-400 dark:text-white" />
        <ul className="flex flex-row justify-center flex-grow">
          <li>
            <a
              href="#"
              className="font-semibold hover:text-gray-300 p-4 text-gray-400 dark:text-white"
            >
              Home
            </a>
          </li>
          <li>
            <a
              href="#"
              className="font-semibold hover:text-gray-300 p-4 text-gray-400 dark:text-white"
            >
              Products
            </a>
          </li>
          <li>
            <a
              href="#"
              className="font-semibold hover:text-gray-300 p-4 text-gray-400 dark:text-white"
            >
              About
            </a>
          </li>
          <li>
            <a
              href="#"
              className="font-semibold hover:text-gray-300 p-4 text-gray-400 dark:text-white"
            >
              Contact
            </a>
          </li>
        </ul>
        <div className="flex flex-row items-center justify-center mr-5">
          <Switch onClick={toggleDarkMode} />
        </div>
      </nav>
    </div>
  );
};

export default Nav;
