import { Switch } from "@material-tailwind/react";

import { BeakerIcon } from "@heroicons/react/24/solid";

import { Link } from "react-router-dom";
const Nav = ({ toggleDarkMode }) => {
  return (
    <div>
      <nav
        className="flex flex-row items-center shadow bg-gray-100 dark:bg-gray-800"
        style={{ height: "12vh", width: "100vw" }}
      >
        <BeakerIcon className="ml-5 h-10 text-gray-400 dark:text-white" />
        <ul className="flex flex-row justify-center flex-grow">
          <li>
            <Link to="/">
              <p className="font-semibold hover:text-gray-300 p-4 text-gray-400 dark:text-white">
                Accueil
              </p>
            </Link>
          </li>
          <li>
            <Link to="/login">
              <p className="font-semibold hover:text-gray-300 p-4 text-gray-400 dark:text-white">
                Se connecter
              </p>
            </Link>
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
