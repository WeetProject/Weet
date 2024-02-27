const flights = [
    { src: 'https://beebom.com/wp-content/uploads/2018/12/Lufthansa-Logo.jpg', style: { height: '51px', margin: '22px 12px' }, label: 'rgb(13, 28, 83)' },
    // Other flight objects...
];

function createFlightCell(flight, index) {
    const cell = document.createElement('div');
    cell.classList.add('flight-cell');

    const flightImage = document.createElement('img');
    flightImage.src = flight.src;
    flightImage.style.height = flight.style.height;
    flightImage.style.margin = flight.style.margin;

    const label = document.createElement('div');
    label.style.fontWeight = 'bold';
    label.style.color = flight.label;
    label.textContent = 'From BLR Kempegowda International';

    // Append flightImage and label to cell

    cell.appendChild(flightImage);
    cell.appendChild(label);

    // Add click event listener
    cell.addEventListener('click', () => {
        handleCellClick(cell);
    });

    return cell;
}

function handleCellClick(cell) {
    const isActive = cell.classList.contains('active');
    if (isActive) {
        cell.classList.remove('active');
    } else {
        cell.classList.add('active');
    }
}

document.addEventListener('DOMContentLoaded', function() {
    const rootElement = document.getElementById('root');
    flights.forEach((flight, index) => {
        const flightCell = createFlightCell(flight, index);
        rootElement.appendChild(flightCell);
    });
});
