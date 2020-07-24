// Node.js를 활용한 이메일 보내기!!

var nodemailer = require("nodemailer");

var transporter = nodemailer.createTransport({
  service: "gmail",
  auth: {
    user: "yuhantrum@gmail.com",
    pass: "xmfjavldk123!",
  },
});

var mailOptions = {
  from: "yuhantrum@gmail.com",
  to: "zaqkoko@naver.com",
  subject: "안녕하세요. TOY입니다.",
  text: "아래의 링크를 클릭해주세요",
  html:
    "<p>아래의 링크를 클릭해주세요</p> + <a href = 'http://localhost/Yuhan_Trumpia/login/update.php'>인증하기</a>",
};

transporter.sendMail(mailOptions, function (error, info) {
  if (error) {
    console.log(error);
  } else {
    console.log("Email sent: " + info.response);
  }
});
