const request = async (url, method = "GET", body = null) => {
  const headers = {
    "Content-Type": "application/json",
  };

  const options = {
    method,
    headers,
  };

  if (body) {
    options.body = JSON.stringify(body);
  }

  const response = await fetch(url, options);
  const data = await response.json();

  return data;
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
    options.body = JSON.stringify(body);
  }

  const response = await fetch(url, options);
  const data = await response.json();
  return data;
};

export const getProducts = async () =>
  request("http://127.0.0.1:8000/api/product", "GET", null);

export const getOneProduct = async (id) =>
  request(`http://127.0.0.1:8000/api/product/${id}`, "GET", null);

export const login = async (body) =>
  request("http://127.0.0.1:8000/api/login", "POST", body);

export const getUser = async () =>
  protectedRequest("http://127.0.0.1:8000/api/user", "GET", null);
