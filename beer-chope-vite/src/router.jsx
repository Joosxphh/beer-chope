import React, { useState } from "react";
import { BrowserRouter as Router, Routes, Route } from "react-router-dom";

import App from "./page/Home/Home.jsx";
import ProductShow from "./page/ProductShow/ProductShow.jsx";
import Login from "./page/Login/Login.jsx";
import ForgotPassword from "./page/ForgotPassword/ForgotPassword.jsx";
import Register from "./page/Register/Register.jsx";

import useLogin from "./hooks/useLogin";
import Nav from "./component/header/Nav.jsx";

const AppRouter = () => {
  const [darkMode, setDarkMode] = useState(false);

  const toggleDarkMode = () => setDarkMode(!darkMode);

  const { authUser, logout } = useLogin();

  return (
    <Router>
      {!window.location.pathname.includes("/login") &&
        !window.location.pathname.includes("/register") && (
          <Nav
            toggleDarkMode={toggleDarkMode}
            darkMode={darkMode}
            authUser={authUser}
            logout={logout}
          />
        )}
      <Routes>
        <Route
          path="/"
          element={
            <App
              darkMode={darkMode}
              authUser={authUser}
              toggleDarkMode={toggleDarkMode}
            />
          }
        />
        <Route
          path="/product/:id"
          element={
            <ProductShow
              darkMode={darkMode}
              authUser={authUser}
              toggleDarkMode={toggleDarkMode}
            />
          }
        />
        <Route
          path="/login"
          element={
            <Login
              darkMode={darkMode}
              authUser={authUser}
              toggleDarkMode={toggleDarkMode}
            />
          }
        />
        <Route
          path="/login/forgot-password"
          element={
            <ForgotPassword
              authUser={authUser}
              darkMode={darkMode}
              toggleDarkMode={toggleDarkMode}
            />
          }
        />
        <Route
          path="/register"
          element={
            <Register
              authUser={authUser}
              darkMode={darkMode}
              toggleDarkMode={toggleDarkMode}
            />
          }
        ></Route>
      </Routes>
    </Router>
  );
};

export default AppRouter;
