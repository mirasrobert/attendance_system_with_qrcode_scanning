$(document).ready(function () {
  $('#loginBtn').click(function () {
    addData().then((data) => {
      console.log(data);
    });
  });

  viewData();

  //$('#myTable').DataTable();
});

// View Data
function viewData() {
  let tableRow = '';

  fetchData().then((employees) => {
    employees.forEach((employee) => {
      tableRow += `
			  <tr>
				<td>${employee.id}</td>
				<td>
				  <img
					width="35"
					height="35"
					style="border-radius: 50%;"
					src=${employee.image}
				  />
				</td>
				<td>${employee.name}</td>
				<td>${employee.date}</td>
			  </tr>
			`;
    });

    $('#myTable #tableTbody').html(tableRow);
  });
}

// Get Data
async function fetchData() {
  const response = await fetch('http://localhost:3000/users');
  const data = await response.json();
  return data;
}

// Add Data
async function addAttendance(user) {
  let id = Math.floor(Math.random() * 2147483647);
  var currentdate = new Date();
  var datetime =
    'Last Sync: ' +
    currentdate.getDate() +
    '/' +
    (currentdate.getMonth() + 1) +
    '/' +
    currentdate.getFullYear() +
    ' @ ' +
    currentdate.getHours() +
    ':' +
    currentdate.getMinutes() +
    ':' +
    currentdate.getSeconds();

  let data = {
    id: user.id,
    name: user.name,
    image: user.image,
    date: datetime,
  };

  const rawResponse = await fetch('http://localhost:3000/users', {
    method: 'POST',
    headers: {
      Accept: 'application/json',
      'Content-Type': 'application/json',
    },
    body: JSON.stringify(data),
  });

  let response = await rawResponse.json();

  return response;
}

// Get Single Data
async function getSingleData(id) {
  const response = await fetch('http://localhost:3000/users/' + id);
  const data = await response.json();
  return data;
}
