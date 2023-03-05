const spinner = (element) => {
    console.log(element);
}

const fetchAdminAjax = (action, data, method = 'POST') => {
    const url = ajaxObject.ajaxUrl;
    const body = new FormData();
    body.append('action', action);

    for (const key in data) {
      if (data.hasOwnProperty(key)) {
        body.append(key, data[key]);
      }
    }
    
    return fetch(url, {
      method: method,
      body: body
    })
    .then(response => {
      if (!response.ok) {
        throw new Error(response.statusText);
      }
      return response.json();
    })
    .catch(error => console.log(error));
  }
  

export {
    spinner,
    fetchAdminAjax
}