export const link = encodeURI(`https://wa.me/5511965232865?text=Olá. Vi seu site e preciso de um especialista.`).replace(/%20/g, "+");

export const currentTimestamp = Intl.DateTimeFormat("pt-BR", {
  hour: "numeric",
  minute: "numeric",
}).format(new Date());

export const toggleChat = function (event) {
  event.preventDefault();

  let chat = document.getElementById("fab-chat");

  if (chat !== null) {
    if (chat.classList.contains("animate__fadeInUp")) {
      chat.classList.remove("animate__fadeInUp");
      chat.classList.add("animate__fadeOutDown");
    } else {
      chat.classList.add("animate__fadeInUp");
      chat.classList.remove("animate__fadeOutDown");
    }
  }
};
