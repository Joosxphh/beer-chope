import "./App.css";
import { Nav } from "./component/header";
import { CategoryProduct } from "./component/body";

const App = ({ darkMode, toggleDarkMode }) => {
  return (
    <div className={`${darkMode && "dark"} m-0`}>
      <Nav toggleDarkMode={toggleDarkMode} />
      <CategoryProduct />
    </div>
  );
};

export default App;
