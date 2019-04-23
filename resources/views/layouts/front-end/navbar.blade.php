<style>
    .coner-nav {
        text-align: center;
        width: 160px;
        -webkit-clip-path: polygon(85% 0, 100% 50%, 85% 100%, 0% 100%, 14% 50%, 0% 0%);
        clip-path: polygon(85% 0, 100% 50%, 85% 100%, 0% 100%, 14% 50%, 0% 0%);
        background-color: rgba(0, 152, 255, 0.9) !important;



    }

    .img-round {
        border-radius: 55%;
    }


    ul>li:hover {
        background-color: coral;
    }

    ul>li>a:hover {
        background-color: coral;

    }

    .navbar-dark .navbar-nav .nav-link:hover {
        background-color: coral;
    }

    .nav-link.active,
    .navbar-dark .navbar-nav .nav-link.show,
    .navbar-dark .navbar-nav .show>.nav-link {
        font-size: 16px;
    }



    .dropdown-content {
        display: none;
        position: absolute;
        z-index: 1;
        right: -34%;
        width: 250px;
        background-color: #343a40;

    }

    .dropdown-content a {
        color: black;
        /* padding: 12px 16px; */
        text-decoration: none;
        display: block;
        float: left;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }

    .nav-cotent {
        z-index: 1;
        background-color: #343a40 !important;
        margin-bottom: 10%;
        padding-bottom: 3%;
    }

    .nav-height {
        height: 60px;
    }


    @media screen and (max-width: 992px) {
        .nav-height {
            height: 81px;
        }

    }
</style>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mr-2 ml-2 nav-height">
    <!-- <a class="navbar-brand" href="/view/index">
        <img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxIQEhUSEhAVEhUXFRISFhIWEBUQFRUZGxUXFhYVGRYZHSggGBolGxUVITEhJSkrLi4xGB8zODMsNygtLisBCgoKDg0OGxAQGy0lICUtLS0tKy8wLS0tLi8tMi0tLS0uLS0tLS0tLS0tLy0tLS0tLS0tLS0tLS0tLS0tLS0tLf/AABEIAOEA4QMBEQACEQEDEQH/xAAbAAEAAgMBAQAAAAAAAAAAAAAABQYDBAcCAf/EAEAQAAIBAQMHCQQIBgMBAAAAAAABAgMEBREGEiExQVFxIjJhgZGhscHRBxNCsiM0UmJyc5LwFEOCk6LhFTNEY//EABsBAQACAwEBAAAAAAAAAAAAAAAEBQIDBgEH/8QAOBEBAAIBAgQCCAQGAgIDAAAAAAECAwQRBRIhMUFREyIyYXGRsdFCgaHhFDM0UnLwI/EGwRUkYv/aAAwDAQACEQMRAD8A7iAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA+YgYKtupR51WEeNSK8WZxjtPaJarZsde9oj84YVfFmf/po/3oepl6DL/bPylhGs089IyV+cNmlaYT5s4y4ST8DXNZjvDbXJW3aYZTxmAAAAAAAAAAAAAAAAAAAAAAAAHmdRRTbaSWltvBLrERv2eTMRG8q1emWtCliqeNaX3dEP1PX1Jlhh4blv1t0j9fkqNTxrBi6U9afd2+f2Vi3ZZWqpzZRpLdCOL/U8e7AssfDMNfa6qXNxrU39n1Y933QlottWpz6k5/im5eLJlMOOns1iFbfUZcnt2mfjLAbGrcAAidm9Zb4tFLmV5roznJfpeKNF9Lhv7VYSset1GP2bz809d+XVaOirCNRb1yJej7EQcvCqT7E7LTBx7LXpkiJ+HSVsunKSz2nBRnmzf8ufJl1bJdTKvNo8uL2o6ecLzTcSwajpWdp8p7pgjJ4AAAAAAAAAAAAAAAAAAAEJf+UlKyLDn1MNFNPV0yfwrvJWm0l889Okef8AvdX63iOLSxtPW3l9/Jzu977rWp/ST5OOKprRBdW19LL/AE+kx4Y9WOvm5LV6/NqZ9eenl4I4koYHgAAAAAAAHu6x3HldWoYRqY1ae5vlx4S28H3FdqeHUydadJ/RcaPjGXD6uT1q/r/vxdCu28adohn0pqS27Gnua2MosuK+K3LeNnV4NRjz058c7w2zW3AAAAAAAAAAAAAAAACpZWZVe5xo0XjU1SnrUOhb5eBZaLQzl9e/s/X9lHxPisYd8eL2vGfL93Pqk3JttttvFtvFt72y/rERG0OTtabTvM7vJ6xAAAAAAAAAAABuXXeVSzTU6csHtWyS3NbTTmwUy15bQk6bVZNPfnpP7un3BfdO1wzo8mSwz4N6YvzT2M5vU6a2C21u3hLtNFraaqm9e/jHl+yVI6aAAAAAAAAAAAAAArGWWUP8PH3VN/SyWv7Ed/4ns7dxYaDR+mtzW9mP1U/FeI/w9fR09qf0j/ezm7eJ0URt2cdMzM7y+B4AAMtCzTnzY49OpdpjbJWvdtpitf2YSNG5vtT6orHvfoR51PlCVXRT+KWzG6qS2N8ZehrnPeW6NJjh6/4yl9j/ACl6nnpr+bL+FxeTHO6Kb1OS68fEyjUXhhbR457dGnXuia5rUujms211FfFHvo7R7PVoTg4vBpp7noN8TE9kW1ZrO0vJ6xAAG1dtvnZ6iqU3g12NbYvejVmw1y05bJGm1F8GSMlO/wDvR1i5rzhaqSqQ4SjtjLbF/vccvnw2w3mlnc6XU01GOL0/6bxqSQAAAAAAAAAAAaN9XlGzUpVZacFgl9qT1I24MM5bxSEfVaiunxTkt4fVyK12mVWcqk3jKTxb/ew6vHjrjrFa9ocFmy2y3m9u8sRk1ABIPUvYbq+Kp+n19CJkz+FU/DpPG/yS1OGqMV0JJeCRGmdusyn1r4VhK2W4as9MsILp0vsXmRb6yle3VOx8Py29rokaWTUPiqSfDCPqR51t/CIS68Np4zLK8nKO+f6l6GP8Zk9zP/47F72vWyZXwVHwlHHvRsrrZ8Yar8Mj8NkTbLqq0tLjivtR5S9USaanHfxQcuky4+sxvHuR1ehGawksfFcGSa2ms9EO+Ot42lB2+73T0rTHftXH1JmPNFuk91bm0806x2aRuRQABNZKXy7LWWL+jnhGa3bpdXhiQtdpvTY947x2+yz4ZrZ02Xr7M9J+7qsXic07d9AAAAAAAAAAAHN8vb097WVFPk09fTN6+xaO0vuGYOWnpJ7z9HI8b1XPl9FHav1VctFGAAJy67BmrPkuU9S+z/shZsvN0jss9Np4rHNbunLvsE60sI6EtcnqXq+gh5c1ccdVng09s1to7eMrZYLup0VyVp2yelv04FVky2yT1XuHT0xR6sfm3DW3gAAAAh70uONTGUMIz3aoy47n0krDqbU6W6wganQ1yda9JVatScW4yWDWhplnW0WjeFJek1ma2hX7zsPu3nR5r7nuJ2HLzdJ7qrU4OSd47NA3ogAA6VkJenvqHu5PGVLCPS4/C/FdRznEcHo8vNHaf9l2XBtV6bBy2716fl4LMQFwAR96X1Qsy+lng2sVFLOk+peJuw6fJlnakIuo1mHTxvkn8vFVLdl7J6KNFL71R4/4x9Szx8J/vt8lJm4/PbFT85+37oW0ZV2uf87N6IxjHvwx7yZTh2nr+Hf4q3JxfVX/ABbfDZpSvm0v/wBFX+7L1N0aXDH4I+SPOu1M/jn5stHKC1Q1Wip1yz+6WJjbRYLd6wzpxLVV7Xn6/VMWDLmvB4VYRqrevo5d2juImXhVJ9idv1WGDj2as7ZIiY+Urhc9/wBC1LkSwltpy0SXVt6ipz6XJhn1o6efgv8AS6/DqY9SevlPduXla1RpTqP4YylxwWhdpqx0m94rHikZ8sYsdrz4Ru41VqOTcpPFtuTe9t4s66tYrERHg+e3vN7Tae8vJ6wAJC6LLnyznqj3v9+Roz32jaEvS4ua3NPaFksVllVmoR263uW1lfkyRjrvK5w4py3isLrZLLGlFQitC7W976SmvebzzS6LFjrjry1ZzFsAAAAAAARd+XYqsc6K5a1dK+y/IkafN6Odp7Ies03pa7x7UKdVpqScWtD0Mt6226w5+1eaJrKsWmi4ScXs79zLGluaN1LkpNLbSxmTWATeR1u9zaoaeTP6N9fN/wAsCDxDFz4ZnxjqtOE5/RamIntbp9v1dVObdsAa9ssdOtFwqQU47msezczKl7Unes7S15cNMteW8bwoeUWR8qONShjOGluGuceH2l38dZd6TiMX9XJ0nz8HMa/g04974eseXjH3+qplsoQ8eAAD1TqOLUotpp4pp4NPemeWrFo2nsyre1Z5qztKwW/Kidey+5muXnRxmtClFadK2PFRK/FoIx5+evby8pW+fits2l9Ff2t46+cfdXSxUwAD1ZrDRzIKO3W+L1/voK7JbmtMrnDTkpELjk1Y8ynntaZ/Ls7dfYVGryc1+XydDw/DyU557z9EyRU8AAAAAAAAAVLKOye7qZyWieL69vk+tlnpMnNXlnwUWvw8mTmjtP1VS/KOhT/pfl59paae3WaqPWU6RZDktXAH2MmmmtDWlPpExExtLKtprMTDs932j3tKFRfHCM+1JnH3ryWmvlL6JhyRkx1vHjES2DFsAAFNysyUU8a1COE9cqa1S3uK2S6NvHXaaLXzT1Mnbz8lBxPhMZN8uGOvjHn8PeoLRfbuVmJjuB4AAAAABmsVPOqRXSvUwyTtSZbcVea8QtNOGc1Fa20u14FbadomV3WvNaK+a/0oKKUVqSSXUUczvO7qaxtG0PR49AAAAAAAAAEVlJRzqLe2LUvJ9zJGlttkj3oWvpzYZny6qVb4Z1OS6G+zT5Fzjna0S5zNHNjmFZLFTAeAHVMi62dY6WOzPj2TaXdgcxrq8uos7nhN+fSU/OP1ThEWIAAAUvLPJrOxtFGPK11IL4t8kt+9beOu10Gt5J9HeenhPk5/i3DOeJzYo6+Mefv+Khl65YDwAAAAG5dC+lj/AFeDNWf2EnSx/wAkLZdKxrU/xL1KvUdMcr3Sxvmr8V4KZ0gAAAAAAAAAAat6LGjUX3JeBnina8fFp1Eb4rfCVFmtD4MvPFzM9lTLNRAeAHSvZ9LGy8Kk14PzOd4nH/P+UOy4JP8A9X85WYr1wAAAADnuWuTvum7RSjyG+XFfA38S+6+58S84frOb/iv38Ps5XjHDuSfTY46eMeXvVEtnPgAAAA27plhVj1ruZqzx6kpGmnbJC2XZPNrU39+Pe8PMq88b45+C901tstZ968lM6UAAAAAAAAAANS9p4Uan4JLtWHmbMUb3j4tGpnbFafdKi1Hgm9yb7i7ju5m07RKqFmowPAPXTMgIYWRPfOb8F5HOcSnfPPwh2fBY20sfGVkIC2AAAAB4q01JOMkmmmmnpTT0NM9iZid4Y2rFo2ns5XlRcjslXBYunLFwlu3xb3o6TRaqM1OveO/3cVxLQzpsnq+zPb7IYmqwAAAMlnqZsoy3NMxvG9Zhnjty2iVqjLDSuKK2Y3jZeRO3WF8slZVIRmtqT/0Udq8szDqMd4vWLR4sxizAAAAAAAAAENlRaM2kobZPuWl9+BK0dd77+Sv4jk5cfL5qXedTNpy6Vm9v+sS4xRveHO6i3LjlXCwU4AD11jJGhmWSit8c/wDU3LwZy2stzZ7T79vl0d1wzHyaWke7f59UwRk8AAAAADRvi7YWmlKlPbpT2xlskv3vNuHNbFeL1R9Vp6ajHOO3/U+bklvsc6FSVOawlF4Pp3NdDWk6nFlrlpFquDz4LYck0v3hgNjSAAAerFdVfPprfHkvy7iBlry2W2mvzU+C25MW3Q6Te+UfNefaVOsx7TzwvuHZ+no5/JYSEtQAAAAAAAD42BS75tnvqja5q5MeG/rfkW+nxejp17y57WZvS5OnaOysX5Xxagtml8Xq7vEstPT8Sk1mTeYr5IslIIeDJZ6LqTjCOuUlFcW8EY3vFKzafBsxY5yXikeM7O0WekoRjFaopRXBLBHITO87y+iUrFaxWPBkPGQAAAAAACsZbXH7+n72C+kgt2mUdbjxWlrr3lhoNV6K/Lb2Z+qn4vofT4/SVj1o/WPL7ObHROOA8AAG1d1q93PHY9D9TXlpzQ34Mvo7b+Cy0ari1KL0rBporrVi0TErmlpiYtVcrpvKNeO6S50fNdBUZsM459zodNqa5q+/xhvmlJAAAAAAAV7KC9ddKD6JyXyrzJ2l0+889vyVeu1fT0dPzVe12hU4uT4Jb2WdKTadlHlyRjrvKtTm5Nt63pZYxG0bKe0zM7y8hiAWXIK7/e2j3jXJprO/qeiK8X1FbxPNy4uTxn6Lrgmn9Jn9JPav1dLOfdgAAAAAAAAfGgOW5Z2CNC0tQ0KcVUw2JttNLoxWPWdJw/LbJh9bw6OK4vp64dR6vjG6CJyqAAACSuy8MzkTfJ2Pd/ojZsO/rVTdNqOX1bdk9QrSg1KLwa1NfvSiHasWjaVpS9qTzVlZbuv+MtFTCEt/wv0K3LpLV616wucGvpfpfpP6JqMk9KeJEWG76AAAYrRaI01jOSiul/vEyrWbTtEML3rSN7Tsrl6X854xpYxW2WqT4bvEn4dJt1v8lTqNfNvVx9I80BXrRgs6TwXj0In1rNp2hVXvFI3lXrbanVli9C2LcvUn48cUhU5ss5LbtczaQAkJnZ7Eby6vkpdX8NQjFrly5c+L2dSwXacvrM/pss2jt2h3XDdL/D4IrPees/77kyRU8AAAAAAAAAc39ov1mP5UfnmX/Cv5U/H7OR49/Ux/jH1lVyzUYAAAAN2xXhKnofKju3cDTkwxbrHdJw6m1Ok9YTVntUKnNfVqa6iJalq91jTLW/aW5Z7XUp8ybj0J6OzUab4qX9qErHmyY/ZnZI0soay15suMWvBkedHSe26VXiOWO+0skspamyEF2vzMf4KvmzniWT+2GtVvyvL41H8MUvHFmyukxx72m2vzT47NCpUcnjJuT3t4kitYr0iEW17Wne0o+1XlCGhPOe5autm+mG1kTLqaU7dZQtptMqjxk+C2LgTKUisdFdky2yTvLCZNQAAteQ1x+9n7+a5EHyU/imtvBePBlVxLU8tfR17z3+C+4NofSX9NeOkdvfP7OilE6wAAAAAAAAAAOb+0X6zH8qPzzL/hX8qfj9nI8e/qY/xj6yq5ZqMAAAAAAmHsS26N5VI/Fjx09+s1WwUlvrqclfFtRvp7YLqbRrnTeUt8a2fGHr/mv/n/AJf6PP4afN7/ABseTHO+ZbIpdrMo00eMsJ1tvCGnXtk586Tw3al2I21xVr2hHvmvfvLAZtQAAB6l8nLjna6mGlU48+e77q3yZE1erjBX3z2hYcP0FtVf/wDMd5/3xdUstnjTjGEI5sYrBLcjmrWm07z3dtjx1x1itY2iGUxZgAAAAAAAAABzf2i/WY/lR+eZf8K/lT8fs5Hj39TH+MfWVXLNRgAAAAAAAAAHoHgAAAAJzJ3Jupa3nPGFLHTPDS+iK2vp1LuIOr1tcMbR1t/vdaaDhl9TPNbpXz8/g6ZYbHChBU6cVGK1Lzb2vpOeve17c1u7scOGmGkUpG0Q2DBtAAAAAAAAAAABzf2i/WY/lR+eZf8ACv5U/H7OR49/Ux/jH1lVyzUYAD1OZPZP/wAZCo4zzZwccMVjF4p6HtWrX3EHV6z0F6xMbxK00HDv4vHaYnaY7eTRvK6a1neFWm4rZLXF8JLR5m/DqcWWPUn8vFF1GizYJ9ev5+HzaJvRQPAAAAAAAGxY7FUrSzaUJTe5LVxepdZryZqY43vOzdh0+TNblx13XW4siYxwnaWpvWqa5q/E/i4auJTanic29XF0jz8XSaLglaetn6z5eH7rjCCSSSSS0JJYJFUv4iIjaHoPQAAAAAAAAAAAAOb+0X6zH8qPzzL/AIV/Kn4/ZyPHv6mP8Y+squWajAAer37NObX40/CRScW9uvwl0/8A4/7GT4x/7XOcFJYNJp601imVETt2dDMRMbSgbwyPstXSouk98Hgv0vFdmBNxa/Nj6b7x71Zn4RpsvWI5Z9327K9bMg6q/wCurCa3STpvuxT7ifj4tT8dZj4KrLwDJH8u0T8en3RNbJW2R/kN9MZRl4PElV4hp7fi2+KBbhOrr+Df4TDUnc1pWuz1f7UvQ2xqsM/ij5w0W0Opr3pPyeY3TaHqs9X+1L0Pf4nD/dHzhjGj1E/gt8pbNLJy1y1WefWlD5mjXbXYK/ibq8M1Vu1J+iSsmQ9plz5QprplnvsWjvI1+KYo9mJlNxcCz29uYj9U/d+Q9CGDqSlVe7mR7Fp7yDl4nlt0r0+q0wcDwU63nm/SFks1mhTjmwhGEd0UoruIFrWtO9p3W9MdccbVjaPczGLMAAAAAAAAAAAAAAA5v7RfrMfyo/PMv+Ffyp+P2cjx7+pj/GPrKrlmowAHq+ezWHIrPfKC7E35oo+LT69Y9zqf/H4/47z74XQqXQAAAAAAAAAAAAAAAAAAAAAAAAAAAc39ov1mP5UfnmX/AAr+VPx+zkePf1Mf4x9ZVcs1GAD166lkVYHRsscVhKbdVrjoj/ionMa7L6TNMx2jo7fhOCcOmjfvPX5/sniGsgAAAAAAAAAAAAAAAAAAAAAAAAAAOb+0X6zH8qPzzL/hX8qfj9nI8e/qY/xj6yq5ZqMD1Y8kcnXaZqpUjhRi9q/7GvhXRvfVwrtdrIxRyVn1p/T91xwvh057RkvHqx+v7f8ATpiRzzsX0AAAAAAAAAAAAAAAAAAAAAAAAAAAHN/aJ9aj+VD55l/wudsU/H7OR47G+pjb+2PrKJsNw2mtzKMsPtSWZHtlhj1ErJrMOPvb5dUHDw7UZfZrPxnottzZDwhhK0S949fu44qHW9cu7rKvUcTtbpjjaPPxXuk4HSnrZp3ny8P3W+EFFJJJJaEksEuhFVM79ZX0RERtD0HoAAAAAAAAAAAAAAAAAAAAAAAAAAADx7tY44LHVjhp7Ru85Y33ew9AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAf/2Q==" class="img img-fluid img-round " width="50px" height="50px" alt="arvta">
    </a> -->
    <div class="mr-3">
        <h4 class="text-white "> POS</h4>
    </div>


    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>


    <div class="collapse navbar-collapse  " id="navbarColor01">
        <ul class="nav navbar-nav ml-5 ">

            <li class="nav-item coner-nav ">
                <div class=" ">
                    <a class="nav-link active" href="#">Room </a>
                </div>

            </li>

            <li class="nav-item coner-nav ">
                <div>
                    <a class="nav-link active" href="#">Sale Product</a>
                </div>

            </li>
            <li class="nav-item coner-nav ">
                <div>
                    <a class="nav-link active" href="#">Register Details</a>
                </div>

            </li>
            <li class="nav-item coner-nav ">
                <div>
                    <a class="nav-link active" href="#">Today's Sale</a>
                </div>

            </li>
            <li class="nav-item coner-nav ">
                <div>
                    <a class="nav-link active" href="#">Close Register</a>
                </div>

            </li>
            <!-- <li class="nav-item dropdown coner-nav ">
        <div class="">
          <a class="nav-link dropdown-toggle active" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
            aria-expanded="false">Location</a>
        </div>

        <div class="dropdown-menu" x-placement="bottom-start"
          style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 37px, 0px);">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Separated link</a>
        </div>
      </li> -->


            <!-- <li class="nav-item coner-nav">
        <div class="">
          <a class="nav-link active " href="#">About Us</a>
        </div>

      </li> -->

        </ul>

    </div>

    <div class="dropdown">
        <ul class="nav navbar-nav ml-auto position-relative dropdown">
            <li class="nav-item img-round dropbtn ">
                <a class="ml-auto " data-toggle="collapse" href="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQAbcsfOhKzLDJSzWUqF6BTrfiYNLUurPxa2bsB8rv6WpPu9EEU" class="img-round" alt="" width="30px;" height="30px;">
                </a>

            </li>
            <li>
                <a href="#" data-toggle="control-sidebar" class="sidebar-icon"><i class="fa fa-folder sidebar-icon"></i></a>
            </li>

        </ul>

        <div class=" dropdown-content">
            <ul class="list-group bg-dark">
                <li class="list-group-item active text-center">Setting</li>
                <li class="list-group-item"> <a class="nav-link" href="#"><i class="fas fa-edit mr-2"></i> View Profile</a></li>
                <li class="list-group-item"><a class="nav-link" href="#"><i class="fas fa-power-off mr-2"></i> Log out</a></li>

            </ul>
        </div>
    </div>

</nav>
