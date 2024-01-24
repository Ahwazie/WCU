import json

import numpy as np
from sklearn.linear_model import LinearRegression
import matplotlib.pyplot as plt

# Define the years and corresponding ratios
years = np.array([2024, 2025, 2026, 2027, 2028]).reshape(-1, 1)
ratios = np.array([1/13, 1/13, 1/12, 1/11, 1/10])

# Train a linear regression model
model = LinearRegression()
model.fit(years, ratios)

# Predict the ratios for the next four years
future_years = np.array([2029, 2030, 2031, 2032]).reshape(-1, 1)
predicted_ratios = model.predict(future_years)

# Invert the predicted ratios to match the format in the original data (e.g., 1:10)
predicted_inverted_ratios = 1 / predicted_ratios

# Plotting the existing data and the predictions
plt.scatter(years, ratios, color='blue', label='Actual Data')
plt.plot(years, model.predict(years), color='green', linestyle='-', label='Fitted Line')
plt.scatter(future_years, predicted_ratios, color='red', label='Predictions')

# Label the plot
plt.title('Prediction of Academic Staff to Student Ratio')
plt.xlabel('Year')
plt.ylabel('Ratio (Academic Staff to Student)')
plt.legend()

# Show the plot
plt.show()

# Print the predicted inverted ratios for output
for year, ratio in zip(future_years.flatten(), predicted_inverted_ratios.flatten()):
    print(f"Year {year}: Predicted Ratio 1:{ratio:.2f}")

# Convert the predictions to a dictionary and then to a JSON string
predictions_dict = {str(year): f"1:{ratio:.2f}" for year, ratio in zip(future_years.flatten(), predicted_inverted_ratios.flatten())}
predictions_json = json.dumps(predictions_dict)

# Print the JSON
print(predictions_json)