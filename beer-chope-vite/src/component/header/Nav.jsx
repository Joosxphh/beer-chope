import { Switch } from "@material-tailwind/react";
import { BeakerIcon } from "@heroicons/react/24/solid";
import { Link, useNavigate } from "react-router-dom";
import { ToastContainer, toast } from "react-toastify";
import "react-toastify/dist/ReactToastify.css";

const Nav = ({ toggleDarkMode, darkMode, authUser, logout }) => {
  const navigate = useNavigate();

  const handleLinkClick = () => {
    navigate("/login");
    window.location.reload();
  };

  const handleRegisterClick = () => {
    navigate("/register");
    window.location.reload();
  };

  const handleLogout = () => {
    logout();

    toast.success("Vous avez été déconnecté avec succès");

    setTimeout(() => {
      window.location.reload();
    }, 3000);
  };

  return (
    <div className={`${darkMode && "dark"} m-0`}>
      <nav className="flex justify-between items-center shadow bg-gray-100 dark:bg-gray-800 p-4">
        <div className="flex items-center">
          <BeakerIcon className="h-10 text-gray-400 dark:text-white" />
          <Link to="/">
            <p className="ml-2 font-semibold hover:text-gray-300 text-gray-400 dark:text-white">
              Accueil
            </p>
          </Link>
        </div>
        <ul className="flex items-center">
          {authUser ? (
            <li>
              <p className="font-semibold text-gray-400 dark:text-white">
                {authUser.name}
              </p>
            </li>
          ) : (
            <>
              <li>
                <Link to="" onClick={handleLinkClick}>
                  <p className="font-semibold hover:text-gray-300 text-gray-400 dark:text-white mr-4">
                    Se connecter
                  </p>
                </Link>
              </li>
              <li>
                <Link to="" onClick={handleRegisterClick}>
                  <p className="font-semibold hover:text-gray-300 text-gray-400 dark:text-white">
                    Créer un compte
                  </p>
                </Link>
              </li>
            </>
          )}
        </ul>
        <div className="flex items-center">
          <Switch onClick={toggleDarkMode} />
          {!!authUser && (
            <button
              onClick={handleLogout}
              className="ml-4 px-4 py-2 rounded bg-blue-500 text-white font-semibold hover:bg-blue-600"
            >
              Déconnexion
            </button>
          )}
        </div>
      </nav>
      <ToastContainer />
    </div>
  );
};

export default Nav;
