import "./App.css";
import { Nav } from "./component/header";
import { CategoryLeftPan } from "./component/body";

const App = () => {
  return (
    <div className="App">
      <Nav />
      <CategoryLeftPan />
    </div>
  );
};

export default App;
