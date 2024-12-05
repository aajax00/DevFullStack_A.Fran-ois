document.getElementById('fetchButton').addEventListener('click', async function() {
    try {
      // Make an API request to get the latest breach data
      const response = await fetch('https://haveibeenpwned.com/api/v3/latestbreach', {
        method: 'GET',
        headers: {
          'User-Agent': 'Mozilla/5.0',  // HIBP requires a user-agent header
        }
      });
  
      // Check if the response is successful
      if (!response.ok) {
        throw new Error('Network response was not ok');
      }
  
      const data = await response.json(); // Parse the JSON data from the response
  
      // Log the raw data for debugging
      console.log('Fetched Data:', data);
  
      // Check if data exists and is in the expected format
      if (data && data.Name) {
        // Display the latest breach data
        let displayText = `-Breach Name: ${data.Name}\n`;
        displayText += `-Titre: ${data.Title}\n`;
        displayText += `-Domain: ${data.Domain}\n`;
        displayText += `-Date : ${data.BreachDate}\n`;
        displayText += `-Date d'ajout: ${data.AddedDate}\n`;
        displayText += `-Données fuitées: ${data.DataClasses}\n\n\n`;

        displayText += `Verification ? : ${data.IsVerified}\n`;
        displayText += `Fabrication ? : ${data.IsFabricated}\n`;
        displayText += `Sensibilité ? : ${data.IsSensitive}\n`;
        displayText += `Corrigés ? : ${data.IsRetired}\n`;
        displayText += `Spamlist ? : ${data.IsSpamList}\n`;
        displayText += `Malware ? : ${data.IsMalware}\n`;
        displayText += `Gratuité ? : ${data.IsSubscriptionFree}\n`;

  
        // Display the data on the webpage
        document.getElementById('dataDisplay').innerText = displayText;
      } else {
        document.getElementById('dataDisplay').innerText = 'No breaches found.';
      }
  
    } catch (error) {
      console.error('Error fetching data:', error);
      document.getElementById('dataDisplay').innerText = 'Error fetching data from API.';
    }
  });
  