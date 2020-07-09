(function (global) {
  var AddressBook = function (name, phone) {
    return new AddressBook.init(name, phone);
  };

  AddressBook.prototype = {
    //default functions
    data: [
      //add data here
    ],
    searchResults: [],
    addNewContact: function (name, phone) {
      this.data.push({
        name: name,
        phone: phone,
      });
      return this;
    },
    save: function () {
      //save to local storage. This isn't hugely necessary
    },
    returnAll: function () {
      return this.data;
    },
    displayData: function () {
      this.log(this.data);
      return this;
    },
    log: function (data) {
      console.log(data);
      return this;
    },
    search: function (searchTerm) {
      if (this.data.length) {
        for (var i = 0; i < this.data.length; i++) {
          if (this.data[i].name.toLowerCase() == searchTerm.toLowerCase()) {
            console.error(this.data[i]);
            this.searchResults.push(this.data[i]);
          }
        }

        return this.searchResults;
      } else {
        console.log("결과가 없습니다");
      }
      return this;
    },
    lastResults: function () {
      return this.searchResults;
    },
  };

  AddressBook.init = function (name, phone) {
    var self = this;
    //set up the address book
    if (name || phone) {
      self.addNewContact(name || "", phone || "");
    }
  };

  AddressBook.init.prototype = AddressBook.prototype;

  global.AddressBook = $ab = AddressBook;
})(window);

if (!window.contactList) {
  //check if we already have a contact list
  window.contactList = $ab();
}

var form = document.getElementById("contact");
form.addEventListener("submit", function () {
  if (!window.contactList) {
    //check if we already have a contact list
    window.contactList = $ab(form.person.value, form.phone.value);
  } else {
    //saves new values rather than deleting old ones as well
    contactList.addNewContact(form.person.value, form.phone.value);
  }

  form.person.value = "";
  form.phone.value = "";

  event.preventDefault();
});

var searchForm = document.getElementById("search");
searchForm.addEventListener("submit", function () {
  var results;
  if (results !== undefined) {
    results = null;
  }
  if (!window.contactList) {
    window.contactList = $ab();
  } else {
    results = contactList.search(searchForm.search.value);
  }
  document.getElementById("results").innerHTML = "";
  if (results.length > 0) {
    for (var i = 0; i < results.length; i++) {
      document.getElementById("results").innerHTML +=
        '<div class="contact-item">Name:' +
        results[i].name +
        "<br>Phone:" +
        results[i].phone +
        "</div><hr>";
    }
  } else {
    document.getElementById("results").innerHTML +=
      '<div class="contact-item">결과가 없습니다.</div><hr>';
  }

  //do something with the results
  event.preventDefault();
});

document.getElementById("js-show-all").addEventListener("click", function () {
  if (window.contactList) {
    //check if we already have a contact list
    document.getElementById("show-panel").innerHTML = "";
    var contacts = contactList.returnAll();
    console.log(contacts);
    if (contacts.length > 0) {
      for (var i = 0; i < contacts.length; i++) {
        document.getElementById("show-panel").innerHTML +=
          '<div class="contact-item">Name:' +
          contacts[i].name +
          "<br>Phone:" +
          contacts[i].phone +
          "</div><hr>";
      }
    } else {
      document.getElementById("show-panel").innerHTML +=
        '<div class="contact-item"> 기록이 없습니다.</div><hr>';
    }
  }
  document.getElementById("show-panel").style.display = "block";

  document.getElementById("search-panel").style.display = "none";
  document.getElementById("contact-panel").style.display = "none";
});

document.getElementById("js-search").addEventListener("click", function () {
  document.getElementById("show-panel").style.display = "none";
  document.getElementById("search-panel").style.display = "block";
  document.getElementById("contact-panel").style.display = "none";
});

document.getElementById("js-add-new").addEventListener("click", function () {
  document.getElementById("show-panel").style.display = "none";
  document.getElementById("search-panel").style.display = "none";
  document.getElementById("contact-panel").style.display = "block";
});
