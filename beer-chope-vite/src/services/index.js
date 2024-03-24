import axios from "axios";

const request = async (url, method = "GET", body = null) => {
  const headers = {
    "Content-Type": "application/json",
  };

  const options = {
    method,
    headers,
  };

  if (body) {
    options.data = JSON.stringify(body);
  }

  try {
    const response = await axios(url, options);
    if (response.status === 201) return response;

    return response.data;
  } catch (error) {
    return error.response.data;
  }
};

const protectedRequest = async (url, method = "GET", body = null) => {
  const token = localStorage.getItem("token");

  if (!token) return { error: "Unauthorized" };

  const headers = {
    "Content-Type": "application/json",
    Authorization: `Bearer ${token}`,
  };

  const options = {
    method,
    headers,
  };

  if (body) {
    options.data = JSON.stringify(body);
  }

  try {
    const response = await axios(url, options);
    return response.data;
  } catch (error) {
    return error.response.data;
  }
};

export const getProducts = async () =>
  request("http://127.0.0.1:8000/api/product", "GET", null);

export const getOneProduct = async (id) =>
  request(`http://127.0.0.1:8000/api/product/${id}`, "GET", null);

export const login = async (body) =>
  request("http://127.0.0.1:8000/api/login", "POST", body);

export const register = async (body) =>
  request("http://127.0.0.1:8000/api/register", "POST", body);

export const getUser = async () =>
  protectedRequest("http://127.0.0.1:8000/api/user", "GET", null);

export const getCart = async () =>
  protectedRequest("http://127.0.0.1:8000/api/cart", "GET", null);
