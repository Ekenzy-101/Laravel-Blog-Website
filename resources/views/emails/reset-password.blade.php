<!DOCTYPE html>
  <html>
    <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="initial-scale=1, width=device-width" />
      <link
        rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
      />
      <style>
        * {
          box-sizing: border-box;
          margin: 0;
          padding: 0;
        }
      </style>
    </head>
    <body
      style="
        background-color: #f5f6f8;
        width: 100vw;
        font-family: 'Roboto', Helvetica, sans-serif;
      "
    >
      <br />

      <div
        class="wrapper"
        style="
          background: #fff;
          width: 100%;
          padding: 3rem 1.5rem;
          border-radius: 2px;
        "
      >
        <p style="color: #444; margin: 1rem 0; font-size: 1.1rem">
          Hello <strong>{{$data['username']}}</strong>, we heard that you lost your Laravel's Blog password. Sorry about that.
        </p>

        <p style="color: #444; margin: 1rem 0; font-size: 1.1rem">
          But don't worry! You can use the button to reset your password.
        </p>

        <a
          href="{{$data['link']}}?token={{$data['token']}}"
          style="
            background-color: #005691;
            color: #fff;
            display: block;
            width: fit-content;
            padding: 0.8rem 1rem;
            place-items: center;
            text-align: center;
            outline: none;
            border: none;
            margin: 2rem 0;
            border-radius: 5px;
            text-decoration: none;
          "
          target="_blank"
          rel="noopener"
          referrerpolicy="no-referrer"
        >
          Reset Password
        </a>

        <p style="color: #444; margin: 1rem 0; font-size: 1rem">
          Button not working? Paste the following link into your browser: <a
            href="{{$data['link']}}?token={{$data['token']}}"
            target="_blank"
            rel="noopener"
            referrerpolicy="no-referrer"
            style="text-decoration: none; color: #005691"
            >{{$data['link']}}?token={{$data['token']}}</a
          >
        </p>


        <p style="color: #444; margin: 1rem 0; font-size: 1rem">
          If you have forgotten your password, you can reset <a
            href="{{$data['link']}}"
            target="_blank"
            rel="noopener"
            referrerpolicy="no-referrer"
            style="text-decoration: none; color: #005691"
            >here</a>
        </p>

        <p style="color: #444; margin: 1rem 0; font-size: 1rem">
          You are receiving this email because you recently created a new Laravel Blog account with this email. If this wasn't you please
          ignore this email.
        </p>

        <p style="color: #444; font-weight: 700; font-size: 1rem">
          Thanks
        </p>

        <p style="color: #444; font-weight: 700; font-size: 1rem">
          The Laravel Blog Team
        </p>
      </div>
      <h3
        style="
          font-weight: 700;
          font-size: 2rem;
          text-align: center;
          margin: 2rem auto;
          color: #005691;
        "
        class="footer"
      >
        Laravel Blog
      </h3>
    </body>
  </html>
