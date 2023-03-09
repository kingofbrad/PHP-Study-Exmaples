import React, { useState } from "react";
import jQuery from "jquery";

function App() {
  const [name, setName] = useState("");
  const [result, setResult] = useState("");

  const handleChange = (e: any) => {
    setName(e.target.value);
  };

  const handleSubmit = (e: any) => {
    e.preventDefault();
    const form = jQuery(e.target);
    jQuery.ajax({
      type: "POST",
      url: form.attr("action"),
      data: form.serialize(),
      success(data) {
        setResult(data);
      },
    });
  };

  return (
    <div className="app">
      <form
        action="http://localhost:8000/server.php"
        method="post"
        onSubmit={(e) => handleSubmit(e)}
      >
        <label htmlFor="name">Name: </label>
        <input
          type="text"
          id="name"
          name="name"
          value={name}
          onChange={(e) => handleChange(e)}
        />
        <br />
        <button type="submit">Submit</button>
      </form>
      <h1>{result}</h1>
    </div>
  );
}

export default App;
