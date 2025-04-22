# Use an LTS Node version for stability
FROM node:18-alpine

# Set the working directory
WORKDIR /app

# Copy the package.json and package-lock.json first for caching dependencies
COPY package*.json ./

# Install dependencies
RUN npm install --legacy-peer-deps

# Copy the rest of the application files
COPY . .

# Build the application
RUN npm run build

# Expose the necessary port
EXPOSE 5173

# Start the application
CMD ["npm", "run", "start"]
