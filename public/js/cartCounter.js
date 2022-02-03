let count = 0;

const counter = document.getElementById('counter');
document.getElementById('button1').addEventListener('click', event => {
    const cl = counter.classList;
    const c = 'animated-counter';
    count++;

    counter.innerText = count;
    cl.remove(c, cl.contains(c));
    counter.classList.add('animated-counter');
    document.getElementById('cart').style.color = "#e6b43c";
    // setTimeout(() =>
    //         counter.classList.add('animated-counter')
    //     , 1);
});

document.getElementById('button2').addEventListener('click', event => {
    const cl = counter.classList;
    const c = 'animated-counter';
    count++;

    counter.innerText = count;
    cl.remove(c, cl.contains(c));
    counter.classList.add('animated-counter');
    document.getElementById('cart').style.color = "#e6b43c";
    // setTimeout(() =>
    //         counter.classList.add('animated-counter')
    //     , 1);
});

document.getElementById('button3').addEventListener('click', event => {
    const cl = counter.classList;
    const c = 'animated-counter';
    count++;

    counter.innerText = count;
    cl.remove(c, cl.contains(c));
    counter.classList.add('animated-counter');
    document.getElementById('cart').style.color = "#e6b43c";
    // setTimeout(() =>
    //         counter.classList.add('animated-counter')
    //     , 1);
});

document.getElementById('button4').addEventListener('click', event => {
    const cl = counter.classList;
    const c = 'animated-counter';
    count++;

    counter.innerText = count;
    cl.remove(c, cl.contains(c));
    counter.classList.add('animated-counter');
    document.getElementById('cart').style.color = "#e6b43c";
    // setTimeout(() =>
    //         counter.classList.add('animated-counter')
    //     , 1);
});

document.getElementById('button5').addEventListener('click', event => {
    const cl = counter.classList;
    const c = 'animated-counter';
    count++;

    counter.innerText = count;
    cl.remove(c, cl.contains(c));
    counter.classList.add('animated-counter');
    document.getElementById('cart').style.color = "#e6b43c";
    // setTimeout(() =>
    //         counter.classList.add('animated-counter')
    //     , 1);
});


