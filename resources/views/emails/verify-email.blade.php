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
          Almost done, <strong>{{$data['username']}}</strong> To complete your Laravel Blog sign up, we just need to verify your
          email address: <a href="mailto: {{$data['email']}}" style="text-decoration: none; color: #005691">{{$data['email']}}</a>
        </p>
        <a
          href="{{$data['url']}}"
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
          Verify email address
        </a>
        <p style="color: #444; margin: 1rem 0; font-size: 1rem">
          Once verified, you can start to write awesome blogs for people to read
        </p>
        <p style="color: #444; margin: 1rem 0; font-size: 1rem">
          Button not working? Paste the following link into your browser: <a
            href="{{$data['url']}}"
            target="_blank"
            rel="noopener"
            referrerpolicy="no-referrer"
            style="text-decoration: none; color: #005691"
            >{{$data['url']}}</a
          >
        </p>
        <p style="color: #444; margin: 1rem 0; font-weight: 700; font-size: 1rem">
          Note that the link will expire in 1 hour
        </p>
        <p style="color: #444; margin: 1rem 0; font-size: 1rem">
          You are receiving this email because you recently created a new Laravel Blog account. If this wasn't you please
          ignore this email.
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
