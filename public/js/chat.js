const msgerForm = get(".msger-inputarea");
const msgerInput = get(".msger-input");
const msgerChat = get(".msger-chat");
const PERSON_IMG = "https://cdn-icons-png.flaticon.com/512/2202/2202112.png";
const chatWith = get(".chatWith");
const typing = get(".typing");
const chatStatus = get(".chatStatus");
const chatId = window.location.pathname.substr(6);

msgerForm.addEventListener("submit", event => {

  event.preventDefault();

  const msgText = msgerInput.value;

  if (!msgText) return;

  // Todo el codigo de envio 31/01/24

    axios.post('/message/sent', {
        message: msgText,
        chat_id: 1
    }).then( res => {
        let data = res.data;

        appendMessage(
            data.user.name,
            PERSON_IMG,
            'right',
            data.content,
            formatDate(new Date(data.created_at))
        )
        // console.log(res)

    }).catch(error =>  {
        console.log('Ha ocurrido un error', error);
    });

    msgerInput.value = "";
});

function appendMessage(name, img, side, text, date) {


  //   Simple solution for small apps
  const msgHTML = `
    <div class="msg ${side}-msg">
      <div class="msg-img" style="background-image: url(${img})"></div>

      <div class="msg-bubble">
        <div class="msg-info">
          <div class="msg-info-name">${name}</div>
          <div class="msg-info-time">${date}</div>
        </div>

        <div class="msg-text">${text}</div>
      </div>
    </div>
  `;

  msgerChat.insertAdjacentHTML("beforeend", msgHTML);
  msgerChat.scrollTop += 500;
}
// laravel echo

Echo.join(`chat.${chatId}`)
    .listen('MessageSent', (e) => {
        console.log(e)
    })

// Utils
function get(selector, root = document) {
  return root.querySelector(selector);
}

function formatDate(date) {
  const day = date.getDate();
  const mo = date.getMonth() + 1;
  const y = date.getFullYear();
  const h = "0" + date.getHours();
  const m = "0" + date.getMinutes();

  return `${day}/${mo}/${y} ${h.slice(-2)}:${m.slice(-2)}`;
}

