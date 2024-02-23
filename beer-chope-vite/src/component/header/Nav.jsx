import { BeakerIcon } from "@heroicons/react/24/solid";

const Nav = () => {
  return (
    <nav className="flex flex-row items-center w-full py-4 rounded ">
      <BeakerIcon className="ml-5 h-10 text-gray-400" />
      <ul className="flex flex-row justify-center flex-grow">
        <li>
          <a
            href="#"
            className="text-gray-400 font-semibold hover:text-gray-300 p-4"
          >
            Home
          </a>
        </li>
        <li>
          <a
            href="#"
            className="text-gray-400 font-semibold hover:text-gray-300 p-4"
          >
            Products
          </a>
        </li>
        <li>
          <a
            href="#"
            className="text-gray-400 font-semibold hover:text-gray-300 p-4"
          >
            About
          </a>
        </li>
        <li>
          <a
            href="#"
            className="text-gray-400 font-semibold hover:text-gray-300 p-4"
          >
            Contact
          </a>
        </li>
      </ul>
    </nav>
  );
};

export default Nav;
