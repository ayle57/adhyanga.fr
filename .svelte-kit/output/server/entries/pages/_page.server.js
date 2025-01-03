import { readFileSync } from "fs";
import path from "path";
const prerender = true;
const load = async () => {
  const servicesPath = path.resolve("src/lib/data/services.json");
  const services = JSON.parse(readFileSync(servicesPath, "utf8"));
  return {
    services: services.services
  };
};
export {
  load,
  prerender
};
