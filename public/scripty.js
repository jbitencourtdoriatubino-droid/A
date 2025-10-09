document.getElementById("loginForm").addEventListener("submit", async (e) => {
  e.preventDefault();

  const nome = document.getElementById("nome").value.trim();
  const email = document.getElementById("email").value.trim();
  const senha = document.getElementById("password").value.trim();
  const errorMsg = document.getElementById("errorMsg");

  errorMsg.textContent = "";

  // Validação avançada
  if(!validateName(nome)){
    errorMsg.textContent = "Nome inválido";

  }

  if (!validateEmail(email)) {
    errorMsg.textContent = "Email inválido.";
    return;
  }

  if (senha.length < 6) {
    errorMsg.textContent = "A senha deve ter pelo menos 6 caracteres.";
    return;
  }

  try {
    const response = await fetch("https://suaapi.com/login", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({nome, email, senha }),
    });

    const data = await response.json();

    if (!response.ok) {
      throw new Error(data.message || "Erro ao fazer login.");
    }

    localStorage.setItem("authToken", data.token);
    window.location.href = "dashboard.html";
  } catch (err) {
    errorMsg.textContent = err.message;
  }
});

function validateEmail(email) {
  const re = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
  return re.test(email);
}
