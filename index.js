/* 
I want to transfer the value of each button
clicked to php so that i can change the page that is being viewed

If it works I'll use the same soa as to include the search feature
*/
const submitPageNumber = document.getElementsByName('submitpg').forEach(submitPageNumber => {
    submitPageNumber.addEventListener('click', event => {
      //get the value
      let value = submitPageNumber.innerText;
      document.getElementsByName('submitpg').value = value;
      console.log(document.getElementsByName('submitpg').value);
    })
  });
